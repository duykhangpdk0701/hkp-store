const toVND = (number: string | number | undefined) => {
  if (typeof number === "string") {
    return parseFloat(number).toLocaleString("it-IT", {
      style: "currency",
      currency: "VND",
    });
  } else if (typeof number === "number") {
    return number.toLocaleString("it-IT", {
      style: "currency",
      currency: "VND",
    });
  } else {
    return number;
  }
};

export default toVND;
