import IGender from "../Interfaces/Gender";
import axiosClient from "./axiosClient";

const genderApi = {
  getAllGender: async (): Promise<IGender[]> => {
    const url = "/api/v1/item-person-type";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default genderApi;
