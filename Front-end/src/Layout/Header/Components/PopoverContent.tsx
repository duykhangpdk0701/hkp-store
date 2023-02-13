import { useQuery } from "@tanstack/react-query";
import { Divider, Empty } from "antd";
import React, { Fragment, FC } from "react";
import { Link } from "react-router-dom";
import cartApi from "../../../Api/cartApi";
import IQuotes from "../../../Interfaces/Quotes";
import PopoverContentItem from "./PopoverContentItem";

interface IPopoverContent {
  data?: IQuotes;
  isLoading: boolean;
}

const PopoverContent: FC<IPopoverContent> = (props) => {
  const { data, isLoading } = props;
  return (
    <div>
      {data?.quote_detail.length === 0 ? (
        <Empty />
      ) : (
        data?.quote_detail?.map(
          (item, index) =>
            index < 2 && (
              <Fragment key={item.id}>
                <PopoverContentItem data={item} />
                <Divider className="my-0 py-0" />
              </Fragment>
            )
        )
      )}
      <div className="text-center pt-2">
        <Link className="text-center underline text-orange-500" to="/cart">
          See More
        </Link>
      </div>
    </div>
  );
};

export default PopoverContent;
