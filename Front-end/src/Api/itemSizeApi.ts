import axiosClient from "./axiosClient";

const itemSizeApi = {
  getAllItemSizeApi: async (): Promise<any[]> => {
    const url = "/api/v1/item-person-type";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default itemSizeApi;
