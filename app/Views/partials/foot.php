  <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-vsojdpBZePd4bSa7"></script>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#pay-button').click(function(event) {
              event.preventDefault();
              $(this).attr('disabled', 'disabled');

              var payload = {
                  id: $('#idk').val(),
                  price: $('#price').val(),
                  quantity: $('#quantity').val(),
                  name: $('#name').val(),
                  gross_amount: $('#gross_amount').val()
              };

              $.post('<?= site_url('snap/token') ?>', payload, function(data) {
                  console.log('token = ' + data);
                  snap.pay(data, {
                      onSuccess: function(result) {
                          $('#result-type').val('success');
                          $('#result-data').val(JSON.stringify(result));
                          $('#payment-form').submit();
                      },
                      onPending: function(result) {
                          $('#result-type').val('pending');
                          $('#result-data').val(JSON.stringify(result));
                          $('#payment-form').submit();
                      },
                      onError: function(result) {
                          $('#result-type').val('error');
                          $('#result-data').val(JSON.stringify(result));
                          $('#payment-form').submit();
                      }
                  });
              }).fail(function(xhr) {
                  alert('Failed to get token: ' + xhr.responseText);
                  $('#pay-button').removeAttr('disabled');
              });
          });
      });
  </script>
  <footer class="border-t border-base-200 bg-base-100">
      <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
          <div class="text-sm text-base-content/70">© <?= date('Y') ?> WebMik. All rights reserved.</div>
          <div class="flex gap-3">
              <a href="<?= site_url('terms') ?? '#' ?>" class="link link-hover text-sm">Terms</a>
              <a href="<?= site_url('privacy') ?? '#' ?>" class="link link-hover text-sm">Privacy</a>
          </div>
      </div>
  </footer>

  <script>
      // mobile menu toggle (no dependency on jQuery)
      document.addEventListener('click', function(e) {
          var btn = document.getElementById('mobile-menu-button');
          var menu = document.getElementById('mobile-menu');
          if (!btn || !menu) return;
          if (e.target.closest && e.target.closest('#mobile-menu-button')) {
              menu.classList.toggle('hidden');
          }
      });
  </script>

  <script>
      // theme toggle persisted in localStorage
      (function() {
          var toggle = document.getElementById('theme-toggle');
          if (!toggle) return;

          function setTheme(t) {
              document.documentElement.setAttribute('data-theme', t);
              localStorage.setItem('webmik-theme', t);
          }
          var saved = localStorage.getItem('webmik-theme') || 'webmik';
          setTheme(saved);
          toggle.addEventListener('click', function() {
              var current = document.documentElement.getAttribute('data-theme');
              var next = current === 'dark' ? 'webmik' : 'dark';
              setTheme(next);
          });
      })();
  </script>

  <script>
      // Generic cover preview binding for any future CRUD forms.
      (function() {
          var inputs = document.querySelectorAll('[data-cover-preview-input]');
          if (!inputs.length) return;

          inputs.forEach(function(input) {
              input.addEventListener('change', function() {
                  var targetSelector = input.getAttribute('data-cover-preview-target');
                  if (!targetSelector) return;

                  var preview = document.querySelector(targetSelector);
                  if (!preview) return;

                  var file = input.files && input.files[0];
                  if (!file) {
                      preview.src = '<?= base_url('assets/images/placeholder-cover.svg') ?>';
                      return;
                  }

                  var objectUrl = URL.createObjectURL(file);
                  preview.src = objectUrl;
                  preview.onload = function() {
                      URL.revokeObjectURL(objectUrl);
                  };
              });
          });
      })();
  </script>

  </body>

  </html>