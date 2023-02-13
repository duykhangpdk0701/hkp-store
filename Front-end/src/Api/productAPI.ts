import axiosClient from "./axiosClient";
import IProduct from "../Interfaces/Product";
import IPriceRange from "../Interfaces/PriceRange";
import queryString from "query-string";
import ISearchParams from "../Interfaces/SearchParam";

const productAPI = {
  getAllProduct: async (): Promise<IProduct[]> => {
    const url = "api/v1/item";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getProduct: async (searchParams?: ISearchParams): Promise<IProduct[]> => {
    const url = "api/v1/item";
    if (searchParams) {
      const reqParams = {
        brand_id: searchParams.brand,
        item_category_ids: searchParams.category,
        item_person_type_ids: searchParams.gender,
        search: searchParams.search,
        max_price: searchParams.maxPrice,
        min_price: searchParams.minPrice,
      };
      const searchUrl = url + "?" + queryString.stringify(reqParams);
      const res = await axiosClient.get(searchUrl);
      return res.data;
    }
    const res = await axiosClient.get(url);
    return res.data;
  },

  getFeatureProduct: async (): Promise<IProduct[]> => {
    const url = "api/v1/item?feature=true";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getPriceRange: async (): Promise<IPriceRange> => {
    const url = "api/v1/item-price-ranges";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getProductDetailBySlug: async (slug: string): Promise<IProduct> => {
    const url = `/api/v1/item/${slug}`;
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default productAPI;
