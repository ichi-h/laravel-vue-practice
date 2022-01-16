export const CSRF_TOKEN = (() => {
  return document
    .head
    .querySelector("meta[name='csrf-token']")
    .getAttribute("content")
})();
