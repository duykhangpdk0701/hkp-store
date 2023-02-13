import { Divider, Empty, Image } from "antd";
import React, { FC, Fragment } from "react";
import { IQuoteDetail } from "../../../Interfaces/Quotes";
import CartItem from "./CartItem";
import CartLoading from "./CartLoading";

interface ICartList {
  cartData?: IQuoteDetail[];
  refresh: () => void;
  isLoading: boolean;
}

const CartList: FC<ICartList> = (props) => {
  const { cartData, refresh, isLoading } = props;
  return (
    <div>
      <div>
        <div className="my-6">
          <span className="font-semibold font-base">Cart</span>
        </div>
        <div>
          {isLoading ? (
            <CartLoading />
          ) : cartData?.length === 0 ? (
            <Empty />
          ) : (
            cartData?.map((item, index) => (
              <Fragment key={item.id}>
                <CartItem refresh={refresh} data={item} />
                {index < cartData.length - 1 && <Divider className="m-0" />}
              </Fragment>
            ))
          )}
        </div>
      </div>
    </div>
  );
};

export default CartList;
