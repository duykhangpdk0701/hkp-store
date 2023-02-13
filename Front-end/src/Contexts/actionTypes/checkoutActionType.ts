export interface ICheckoutAddAddress {
  name: string;
  city: number;
  district: number;
  ward: number;
  address: string;
}

export interface ICheckoutAddPhone {
  phone: string;
}

export interface ICheckoutAddPayment {
  paymentMeThodId: number;
}
