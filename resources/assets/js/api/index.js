import { CSRF_TOKEN } from "../utils/csrf";

export const fetchTodosList = async () =>
  fetch("./todos/get", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: null,
  }).then(async (res) => {
    return res.json();
  });

export const fetchOrder = async () =>
  fetch("./orders/get", {
    method: "post",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: null,
  }).then(async (res) => {
    return res.json();
  });
