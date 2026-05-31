---
title: Contact
---

# Contact

<div id="form-status" style="display:none;padding:0.75rem 1rem;border-radius:6px;margin-bottom:1rem;font-weight:500;"></div>

<script>
(function () {
  var p = new URLSearchParams(window.location.search);
  var s = p.get('status');
  var el = document.getElementById('form-status');
  if (s === 'sent') {
    el.style.cssText = 'display:block;padding:0.75rem 1rem;border-radius:6px;margin-bottom:1rem;font-weight:500;background:#d1fae5;color:#065f46;';
    el.textContent = 'Thank you! Your message was sent successfully.';
  } else if (s === 'error') {
    el.style.cssText = 'display:block;padding:0.75rem 1rem;border-radius:6px;margin-bottom:1rem;font-weight:500;background:#fee2e2;color:#991b1b;';
    el.textContent = 'Something went wrong. Please try again or email directly.';
  } else if (s === 'bot') {
    el.style.cssText = 'display:block;padding:0.75rem 1rem;border-radius:6px;margin-bottom:1rem;font-weight:500;background:#fee2e2;color:#991b1b;';
    el.textContent = 'Verification failed. Please complete the CAPTCHA and try again.';
  }
})();
</script>

I am open to fulltime, entry-level opportunities in mechanical engineering.

<form action="/contact.php" method="post" style="max-width:500px;margin-top:1.25rem;">
  <div style="margin-bottom:0.85rem;">
    <label for="c-name" style="display:block;font-weight:600;margin-bottom:0.3rem;">Name</label>
    <input type="text" id="c-name" name="name" required autocomplete="name"
           style="width:100%;padding:0.5rem 0.75rem;border:1px solid #c7d2e1;border-radius:4px;font-size:0.95rem;box-sizing:border-box;">
  </div>
  <div style="margin-bottom:0.85rem;">
    <label for="c-email" style="display:block;font-weight:600;margin-bottom:0.3rem;">Email</label>
    <input type="email" id="c-email" name="email" required autocomplete="email"
           style="width:100%;padding:0.5rem 0.75rem;border:1px solid #c7d2e1;border-radius:4px;font-size:0.95rem;box-sizing:border-box;">
  </div>
  <div style="margin-bottom:0.85rem;">
    <label for="c-message" style="display:block;font-weight:600;margin-bottom:0.3rem;">Message</label>
    <textarea id="c-message" name="message" rows="5" required
              style="width:100%;padding:0.5rem 0.75rem;border:1px solid #c7d2e1;border-radius:4px;font-size:0.95rem;box-sizing:border-box;resize:vertical;"></textarea>
  </div>
  <div style="margin-bottom:1rem;">
    <div class="cf-turnstile" data-sitekey="0x4AAAAAADYnbn3i-Se67p9U"></div>
  </div>
  <button type="submit" class="button-link" style="border:none;cursor:pointer;font-size:1rem;">Send Message</button>
</form>

---

- Email: [hello@ninashabestari.com](mailto:hello@ninashabestari.com)
- LinkedIn: [linkedin.com/in/yourname](https://linkedin.com/in/yourname)
- GitHub: [github.com/yourname](https://github.com/yourname)
