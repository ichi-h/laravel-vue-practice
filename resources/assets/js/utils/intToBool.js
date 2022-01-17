export const intToBool = (i) => {
  if (i === 0 || i === "0" || !i) return false;
  return true;
};
