import { CSRF_TOKEN } from "../utils/csrf";

export const getTodosList = async () =>
  fetch("./todos/get").then(async (res) => {
    return res.json();
  });

export const addTodo = async (task) =>
  fetch("./todos/add", {
    method: "POST",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      task: task
    })
  }).then(async (res) => {
    return res.json();
  });

export const updateTodo = async (todo) =>
  fetch(`./todos/update/${todo.id}`, {
    method: "PATCH",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      task: todo.task,
      is_done: todo.is_done
    }),
  }).then(async (res) => {
    return res.json();
  });

export const deleteTodo = async (id) =>
  fetch(`./todos/delete/${id}`, {
    method: "DELETE",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
  }).then(async (res) => {
    return res.json();
  });

export const getOrder = async () =>
  fetch("./orders/get").then(async (res) => {
    return res.json();
  });

export const setOrder = async (order) =>
  fetch("./orders/set", {
    method: "PATCH",
    headers: {
      "content-type": "application/json",
      "X-CSRF-TOKEN": CSRF_TOKEN,
    },
    body: JSON.stringify({
      todo_order: order
    }),
  }).then(async (res) => {
    return res.json();
  });
