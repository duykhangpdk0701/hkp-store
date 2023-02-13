import { Image } from "antd";
import React, { FC } from "react";
import { Link } from "react-router-dom";
import product5 from "../../../../../Assets/Product/product5.jpg";
import IProduct from "../../../../../Interfaces/Product";

interface IProductItem {
  imgThumbnail: string;
  productData: IProduct;
}

const ProductItem: FC<IProductItem> = (props) => {
  const { imgThumbnail, productData } = props;

  return (
    <div>
      <div>
        <Link to={`/product/${productData.slug}`}>
          <Image src={imgThumbnail} preview={false} />
        </Link>
      </div>
      <div>
        <h3 className="text-base font-medium mb-0">
          <Link to={`/product/${productData.slug}`} className="text-gray-500">
            {productData.name}
          </Link>
        </h3>
        <span className="text-sm font-medium">
          {productData.stock_lowest_price}
        </span>
        {/* <span className="text-sm ml-1 line-through font-medium text-gray-400">
          $86.00
        </span> */}
      </div>
    </div>
  );
};

export default ProductItem;
