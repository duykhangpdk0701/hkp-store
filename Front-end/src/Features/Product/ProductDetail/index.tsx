import { useMutation, useQuery, useQueryClient } from "@tanstack/react-query";
import { useForm, useWatch } from "antd/es/form/Form";
import React, { useEffect } from "react";
import { useParams } from "react-router-dom";
import productAPI from "../../../Api/productAPI";
import ProductDetails from "./Components/ProductDetails";
import ProductDetailsLoading from "./Components/ProductDetails/ProductDetailsLoading";
import ProductInfo from "./Components/ProductInfo";
import ProductLayout from "./Components/ProductLayout";
import ProductRelated from "./Components/ProductRelated";
import cartApi from "../../../Api/cartApi";
import { useAppSelector } from "../../../Hooks/redux";
import { notification } from "antd";

export interface IProductDetailForm {
  color: number;
  size: number;
  quantity: number;
}

export interface IAddToCartMutation {
  itemVariant: number;
  quoteId: number | null;
  quantity: number | null;
}

const ProductDetail = () => {
  const { slug } = useParams();
  const [form] = useForm<IProductDetailForm>();
  const size = useWatch("size", form);
  const cartState = useAppSelector((state) => state.cart);
  const queryClient = useQueryClient();
  const productQuery = useQuery({
    queryKey: ["productDetail", slug],
    queryFn: () => productAPI.getProductDetailBySlug(slug as string),
  });

  const addToCartMutation = useMutation({
    mutationKey: ["addToCart"],
    mutationFn: ({ itemVariant, quoteId, quantity }: IAddToCartMutation) =>
      cartApi.createSessionCartAndAddToQuotes(itemVariant, quoteId, quantity),
    onSuccess: () => {
      queryClient.refetchQueries(["cartHeader"]);
      notification.success({
        message: "Add to cart",
        description: "Add to cart successfully",
        placement: "bottomLeft",
      });
    },
  });

  const onFinish = (values: IProductDetailForm) => {
    const { color, size, quantity } = values;
    if (productQuery.data) {
      const productVariant = productQuery.data.variants.find((value) => {
        return value.color_id == color && value.size_id == size;
      });
      if (productVariant) {
        addToCartMutation.mutate({
          itemVariant: productVariant.id,
          quoteId: cartState.userCartId,
          quantity,
        });
      }
    }
  };

  return productQuery.isLoading ? (
    <ProductLayout
      detailComponent={<ProductDetailsLoading />}
      infoComponent={<ProductInfo />}
      relateComponent={<ProductRelated />}
    />
  ) : (
    <ProductLayout
      detailComponent={
        <ProductDetails
          data={productQuery.data}
          form={form}
          size={size}
          onFinish={onFinish}
          isLoading={addToCartMutation.isLoading}
        />
      }
      infoComponent={<ProductInfo />}
      relateComponent={<ProductRelated />}
    />
  );
};

export default ProductDetail;
