import ISize from "../Interfaces/Size";
import axiosClient from "./axiosClient";

const sizeAPI = {
  getAllSize: async (): Promise<ISize[]> => {
    const url = "/api/v1/item-size";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default sizeAPI;
