import { MenuOutlined } from "@ant-design/icons";
import { Col, Empty, Input, Row, Skeleton, Space, Typography } from "antd";
import React, { FC } from "react";
import SearchInput from "../../../../../Components/SearchInput";
import IProduct from "../../../../../Interfaces/Product";
import ProductItem from "./ProductItem";
import ProductItemLoading from "./ProductItemLoading";

interface IProductShop {
  listProduct?: IProduct[];
  isLoading: boolean;
  onSearch: (values: string) => void;
  showDrawer: () => void;
}

const { Title } = Typography;

const ProductShop: FC<IProductShop> = (props) => {
  const { listProduct, isLoading, onSearch, showDrawer } = props;

  return (
    <div>
      <div>
        <Title level={1}>Shop</Title>
      </div>

      <div className="mb-5">
        <Row justify="space-between" align="middle">
          <Col>
            <div>
              <SearchInput
                onSearch={onSearch}
                placeholder="Search here..."
                size="large"
              />
            </div>
          </Col>
          <Col lg={0}>
            <div>
              <MenuOutlined onClick={showDrawer} className="text-2xl" />
            </div>
          </Col>
        </Row>
      </div>
      <div>
        {listProduct?.length === 0 ? (
          <Empty />
        ) : isLoading ? (
          ProductItemLoading()
        ) : (
          <Row gutter={[25, 25]}>
            {listProduct?.map((item) => (
              <Col span={24} lg={8} md={8} key={item.id}>
                <ProductItem
                  productData={item}
                  imgThumbnail={item.thumbnail_url}
                />
              </Col>
            ))}
          </Row>
        )}
      </div>
    </div>
  );
};

export default ProductShop;
