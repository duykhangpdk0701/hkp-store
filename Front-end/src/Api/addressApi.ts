import { ICity, IDistrict, IWard } from "../Interfaces/Address";
import axiosClient from "./axiosClient";

const addressApi = {
  getListCity: async (): Promise<ICity[]> => {
    const url = "/api/v1/city";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getListDistrict: async (
    cityId: string | number | undefined
  ): Promise<IDistrict[]> => {
    const url = `api/v1/city/${cityId}`;
    const res = await axiosClient.get(url);
    return res.data;
  },

  getListWard: async (
    districtId: string | number | undefined
  ): Promise<IWard[]> => {
    const url = `/api/v1/district/${districtId}`;
    const res = await axiosClient.get(url);
    return res.data;
  },

  createNewAddress: async (
    name: string,
    cityId: number,
    districtId: number,
    wardId: number,
    address: string
  ): Promise<any> => {
    const url = "api/v1/address";

    const reqData = {
      name,
      city_id: cityId,
      district_id: districtId,
      ward_id: wardId,
      address,
    };

    const res = await axiosClient.post(url, reqData);

    return res.data;
  },

  updateAddress: async (
    addressId: number,
    name: string,
    cityId: number,
    districtId: number,
    wardId: number,
    address: string
  ): Promise<any> => {
    const url = `api/v1/address/${addressId}`;

    const reqData = {
      name,
      city_id: cityId,
      district_id: districtId,
      ward_id: wardId,
      address,
    };

    const res = await axiosClient.put(url, reqData);
    return res.data;
  },

  deleteAddress: async (addressId: number): Promise<any> => {
    const url = `api/v1/address/${addressId}`;
    const res = await axiosClient.delete(url);
    return res.data;
  },

  setDefaultAddress: async (addressId: number): Promise<any> => {
    const url = `api/v1/address/${addressId}/set-to-default`;
    const res = await axiosClient.post(url);
    return res.data;
  },
};

export default addressApi;
