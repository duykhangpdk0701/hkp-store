import IBrand from "../Interfaces/Brand";
import axiosClient from "./axiosClient";

const brandApi = {
  getAllBrand: async (): Promise<IBrand[]> => {
    const url = "/api/v1/brand";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default brandApi;
