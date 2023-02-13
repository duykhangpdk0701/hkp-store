import { Image } from "antd";
import React, { FC } from "react";
import { Link } from "react-router-dom";
import product5 from "../../../Assets/Product/product5.jpg";
import { IQuoteDetail } from "../../../Interfaces/Quotes";
import toVND from "../../../Utils/toVND";

interface IPopoverContentItem {
  data: IQuoteDetail;
}

const PopoverContentItem: FC<IPopoverContentItem> = (props) => {
  const { data } = props;
  return (
    <Link to={`/product/${data.item.slug}`}>
      <div>
        <div className="my-5 mx-0 flex">
          <div className="mr-5">
            <Image
              className="object-cover"
              height={40}
              width={40}
              preview={false}
              src={data.item.thumbnail_url}
            />
          </div>
          <div className="basis-full">
            <div className="flex justify-between">
              <span className="text-sm font-semibold">
                {data.item.name}({data.size_value}, {data.color_name})
              </span>
              <span className="text-xs ml-10">{toVND(data.item_price)}</span>
            </div>
            <div className="flex justify-between">
              <div className="flex items-center mr-10">
                <span className="mr-1 text-xs">Quantity:</span>
                <span className="mr-1 text-xs">{toVND(data.quantity)}</span>
              </div>
              <div className="ml-10">
                <span className="text-xs font-semibold">
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
    </Link>
  );
};

export default PopoverContentItem;
