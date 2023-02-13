import { Image } from "antd";
import React, { FC } from "react";
import { IQuoteDetail } from "../../../Interfaces/Quotes";
import toVND from "../../../Utils/toVND";

interface IBasketItem {
  data: IQuoteDetail;
}

const BasketItem: FC<IBasketItem> = (props) => {
  const { data } = props;
  return (
    <div>
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
          <div className="flex justify-between">
            <span className="text-base font-semibold">
              {data.item.name}({data.size_value}, {data.color_name})
            </span>
            <span className="text-sm">{toVND(data.item_price)}</span>
          </div>
          <div className="flex justify-between">
            <div className="flex items-center">
              <span className="mr-1 text-sm">Quantity:</span>
              <span className="mr-1 text-sm">{data.quantity}</span>
            </div>
            <div>
              <span className="text-base font-semibold">
                {toVND(data.total_price)}
              </span>
            </div>
          </div>
          <div className="flex justify-between">
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default BasketItem;
