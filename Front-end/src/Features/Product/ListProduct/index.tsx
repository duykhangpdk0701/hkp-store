import { useForm } from "antd/es/form/Form";
import React, { useEffect, useState } from "react";
import ProductLayout from "./Components/ProductLayout";
import ProductShop from "./Components/ProductShop";
import ProductSidebar from "./Components/ProductSidebar";
import { useQueries } from "@tanstack/react-query";
import brandApi from "../../../Api/brandApi";
import categoryApi from "../../../Api/categoryAPI";
import genderApi from "../../../Api/genderAPI";
import productAPI from "../../../Api/productAPI";
import { useLocation, useSearchParams } from "react-router-dom";
import queryString from "query-string";
import sizeAPI from "../../../Api/sizeAPI";
import ISearchParams from "../../../Interfaces/SearchParam";
import ProductDrawer from "./Components/ProductDrawer";

const ListProduct = () => {
  const [radioForm] = useForm();
  const [sliderForm] = useForm();
  const [searchParams, setSearchParams] = useSearchParams();
  const location = useLocation();
  const [isOpenDrawer, setIsOpenDrawer] = useState(false);

  const result = useQueries({
    queries: [
      {
        queryKey: ["category"],
        queryFn: categoryApi.getAllCategories,
      },
      {
        queryKey: ["brand"],
        queryFn: brandApi.getAllBrand,
      },
      {
        queryKey: ["gender"],
        queryFn: genderApi.getAllGender,
      },
      {
        queryKey: ["size"],
        queryFn: sizeAPI.getAllSize,
      },
    ],
  });

  const product = useQueries({
    queries: [
      {
        queryKey: ["products"],
        queryFn: () => {
          const queryParams: ISearchParams = queryString.parse(location.search);
          return productAPI.getProduct(queryParams);
        },
      },
      {
        queryKey: ["priceRange"],
        queryFn: productAPI.getPriceRange,
      },
    ],
  });

  const onFinishRadioFilter = async (_: any, values: any) => {
    const params = queryString.stringify({
      category: values.category,
      brand: values.brand,
      gender: values.gender,
      size: values.size,
    });

    setSearchParams(params);
  };

  useEffect(() => {
    product[0].refetch();
  }, [searchParams]);

  const onSearch = async (value: string) => {
    const params = queryString.parse(searchParams.toString());
    const search = queryString.stringify({ ...params, search: value });
    setSearchParams(search);
  };

  const onFinishSliderFilter = (values: { range: [number, number] }) => {
    const params = queryString.parse(searchParams.toString());
    const search = queryString.stringify({
      ...params,
      maxPrice: values.range[1],
      minPrice: values.range[0],
    });
    console.log(search);
    setSearchParams(search);
  };
  const showDrawer = () => {
    setIsOpenDrawer(true);
  };

  const onClose = () => {
    setIsOpenDrawer(false);
  };
  return (
    <ProductLayout
      drawer={
        <ProductDrawer
          productSideBar={
            <ProductSidebar
              listCategory={result[0].data}
              isCategoryListLoading={result[0].isLoading}
              listBrand={result[1].data}
              isBrandListLoading={result[1].isLoading}
              listGender={result[2].data}
              isGenderListLoading={result[2].isLoading}
              radioForm={radioForm}
              sliderForm={sliderForm}
              onChangeRadioFilter={onFinishRadioFilter}
              onFinishSliderFilter={onFinishSliderFilter}
              priceRange={product[1].data}
              isLoadingPriceRange={product[1].isLoading}
              listSize={result[3].data}
              isLoadingListSize={result[3].isLoading}
            />
          }
          open={isOpenDrawer}
          onClose={onClose}
        />
      }
      shop={
        <ProductShop
          showDrawer={showDrawer}
          onSearch={onSearch}
          listProduct={product[0].data}
          isLoading={product[0].isFetching}
        />
      }
      sidebar={
        <ProductSidebar
          listCategory={result[0].data}
          isCategoryListLoading={result[0].isLoading}
          listBrand={result[1].data}
          isBrandListLoading={result[1].isLoading}
          listGender={result[2].data}
          isGenderListLoading={result[2].isLoading}
          radioForm={radioForm}
          sliderForm={sliderForm}
          onChangeRadioFilter={onFinishRadioFilter}
          onFinishSliderFilter={onFinishSliderFilter}
          priceRange={product[1].data}
          isLoadingPriceRange={product[1].isLoading}
          listSize={result[3].data}
          isLoadingListSize={result[3].isLoading}
        />
      }
    />
  );
};

export default ListProduct;
