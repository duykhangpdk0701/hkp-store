import ICategory from "../Interfaces/Category";
import axiosClient from "./axiosClient";

const categoryApi = {
  getAllCategories: async (): Promise<ICategory[]> => {
    const url = "/api/v1/item-category";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default categoryApi;
