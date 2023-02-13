import IAddAddress from "./AddAddress";

interface IUpdateAddress extends IAddAddress {
  addressId: number;
}

export default IUpdateAddress;
