import { useMutation, useQueryClient } from "@tanstack/react-query";
import { Image, InputNumber, Spin } from "antd";
import React, { FC, useState } from "react";
import cartApi from "../../../Api/cartApi";
import { useAppSelector } from "../../../Hooks/redux";
import { IQuoteDetail } from "../../../Interfaces/Quotes";
import toVND from "../../../Utils/toVND";

interface IDeleteCartMutation {
  quoteDetailId: number;
  quoteId: number;
}

interface ICartItem {
  data: IQuoteDetail;
  refresh: () => void;
}

const CartItem: FC<ICartItem> = (props) => {
  const { data, refresh } = props;
  const [isLoading, setIsLoading] = useState(false);
  const cartState = useAppSelector((state) => state.cart);
  const queryClient = useQueryClient();

  const deleteCartMutation = useMutation({
    mutationKey: ["cartDelete"],
    mutationFn: ({ quoteDetailId, quoteId }: IDeleteCartMutation) =>
      cartApi.deleteItemQuantity(quoteDetailId, quoteId),
  });

  const minusItemQuantityMutation = useMutation({
    mutationKey: ["cart"],
    mutationFn: ({ quoteDetailId, quoteId }: IDeleteCartMutation) =>
      cartApi.minusItemQuantity(quoteDetailId, quoteId),
  });

  const plusItemQuantityMutation = useMutation({
    mutationKey: ["cart"],
    mutationFn: ({ quoteDetailId, quoteId }: IDeleteCartMutation) =>
      cartApi.minusItemQuantity(quoteDetailId, quoteId),
  });

  const handlePlusItemQuantity = async (quoteDetailId: number) => {
    if (cartState.userCartId) {
      await plusItemQuantityMutation.mutateAsync({
        quoteDetailId,
        quoteId: cartState.userCartId,
      });
      queryClient.refetchQueries(["queryClient"]);
    }
  };

  const handleMinusItemQuantity = async (quoteDetailId: number) => {
    setIsLoading(true);
    if (cartState.userCartId) {
      await minusItemQuantityMutation.mutateAsync({
        quoteDetailId,
        quoteId: cartState.userCartId,
      });
      queryClient.refetchQueries(["queryClient"]);
    }

    setIsLoading(false);
  };

  const handleDelete = async (quoteDetailId: number) => {
    setIsLoading(true);
    if (cartState.userCartId) {
      await deleteCartMutation.mutateAsync({
        quoteDetailId,
        quoteId: cartState.userCartId,
      });
      queryClient.refetchQueries(["queryClient"]);
      await refresh();
    }
    setIsLoading(false);
  };

  return (
    <div>
      <Spin spinning={isLoading} tip="Loading...">
        <div className="my-10 mx-6 flex">
          <div className="mr-5">
            <Image
              className="object-cover"
              height={80}
              width={80}
              preview={false}
              src={data.item.thumbnail_url}
            />
          </div>
          <div className="basis-full">
            <div>
              <span className="text-base font-semibold">
                {data.item.name}({data.size_value}, {data.color_name})
              </span>
            </div>
            <div className="flex justify-between">
              <div className="flex items-center">
                <span className="mr-1 text-sm">Qty:</span>
                <InputNumber className="w-14" defaultValue={data.quantity} />
              </div>
              <div className="flex flex-col text-end">
                <span className="text-sm">{toVND(data.item_price)}</span>
                <span className="text-base font-semibold">
                  {toVND(data.total_price)}
                </span>
              </div>
            </div>
            <div className="flex justify-between">
              <div></div>
              <div>
                <span
                  onClick={() => handleDelete(data.id)}
                  className="underline cursor-pointer text-red-500 text-xs"
                >
                  Remove
                </span>
              </div>
            </div>
          </div>
        </div>
      </Spin>
    </div>
  );
};

export default CartItem;
