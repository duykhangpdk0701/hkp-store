import { Card, Divider } from "antd";
import React, { FC, Fragment } from "react";
import { IQuoteDetail } from "../../../Interfaces/Quotes";
import BasketItem from "./BasketItem";

interface ICheckoutBasketList {
  data?: IQuoteDetail[];
}

const CheckoutBasketList: FC<ICheckoutBasketList> = (props) => {
  const { data } = props;
  return (
    <Card size="small" title="Basket">
      <div>
        {data?.map((item, index) => (
          <Fragment key={item.id}>
            <BasketItem data={item} />
            {index < data.length - 1 && <Divider className="my-0" />}
          </Fragment>
        ))}
      </div>
    </Card>
  );
};

export default CheckoutBasketList;
