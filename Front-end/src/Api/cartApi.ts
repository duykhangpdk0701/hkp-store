import IQuotes from "../Interfaces/Quotes";
import axiosClient from "./axiosClient";

const cartApi = {
  getQuotes: async (): Promise<IQuotes> => {
    const url = "/api/v1/cart/get-quote-by-user";
    const res = await axiosClient.get(url);
    return res.data;
  },

  createSessionCartAndAddToQuotes: async (
    itemVariant: number,
    quoteId: number | null,
    quantity: number | null
  ): Promise<any> => {
    const url = "/api/v1/cart/add-to-cart";
    const reqData = {
      item_variant: itemVariant,
      quote_id: quoteId,
      quantity: quantity,
    };
    const res = await axiosClient.post(url, reqData);
    return res.data;
  },

  plusItemQuantity: async (
    quoteIdDetail: number,
    quoteId: number
  ): Promise<any> => {
    const url = "/api/v1/cart/plus-cart";
    const reqData = {
      quote_detail_id: quoteIdDetail,
      quote_id: quoteId,
    };
    const res = await axiosClient.put(url, reqData);
    return res.data;
  },

  minusItemQuantity: async (
    quoteIdDetail: number,
    quoteId: number
  ): Promise<any> => {
    const url = "api/v1/cart/minus-cart";
    const reqData = {
      quote_detail_id: quoteIdDetail,
      quote_id: quoteId,
    };
    const res = await axiosClient.put(url, reqData);
    return res.data;
  },

  deleteItemQuantity: async (
    quoteDetailId: number,
    quoteId: number
  ): Promise<any> => {
    const url = "api/v1/cart/delete-item-cart";
    const reqData = {
      quote_detail_id: quoteDetailId,
      quote_id: quoteId,
    };
    const res = await axiosClient.put(url, reqData);
    return res.data;
  },
};

export default cartApi;
