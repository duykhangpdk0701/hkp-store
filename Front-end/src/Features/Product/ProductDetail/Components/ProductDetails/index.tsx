import {
  Button,
  Col,
  Form,
  FormInstance,
  Image,
  InputNumber,
  Radio,
  Rate,
  Row,
  Space,
} from "antd";
import React, { FC } from "react";
import IProduct from "../../../../../Interfaces/Product";
import { Navigate } from "react-router-dom";
import { IProductDetailForm } from "../..";
import toVND from "../../../../../Utils/toVND";
import ImageGallery from "react-image-gallery";
interface IProductDetails {
  data?: IProduct;
  form: FormInstance<IProductDetailForm>;
  size: number;
  onFinish: (values: IProductDetailForm) => void;
  isLoading: boolean;
}

const ProductDetails: FC<IProductDetails> = (props) => {
  const { data, form, size, onFinish, isLoading } = props;

  if (!data) {
    return <Navigate to={"/"} replace />;
  }

  return (
    <div>
      <Row gutter={20}>
        <Col lg={10} md={10}>
          <div>
            <ImageGallery
              additionalClass="w-full h-full"
              showFullscreenButton={false}
              showPlayButton={false}
              autoPlay={true}
              showNav={false}
              items={[
                {
                  original: data.thumbnail_url,
                  thumbnail: data.thumbnail_url,
                  thumbnailHeight: 80,
                  thumbnailWidth: 80,
                  originalHeight: 440,
                  originalWidth: 440,
                },
                ...data.media.map((item) => ({
                  original: item.full_url,
                  thumbnail: item.full_url,
                  originalHeight: 440,
                  originalWidth: 440,
                  thumbnailHeight: 80,
                  thumbnailWidth: 80,
                })),
              ]}
            />
          </div>
        </Col>
        <Col lg={14} md={14}>
          <Form disabled={isLoading} form={form} onFinish={onFinish}>
            <div>
              <h1 className="text-gray-500 text-xl">{data.name}</h1>
            </div>
            <Form.Item>
              <Rate className="text-xs" defaultValue={5} disabled />
              <span className="text-xs pl-3 cursor-pointer">1 review</span>
              <span className="text-xs pl-3 cursor-pointer">
                Write a review
              </span>
            </Form.Item>
            <div className="mb-4">
              <span className="text-sm font-medium">
                {toVND(data.stock_lowest_price)}
              </span>
            </div>
            <div>
              <p>{data.description}</p>
            </div>
            <div className="flex">
              <Form.Item
                name="size"
                label={<span className="text-base font-bold mr-20">Size:</span>}
                initialValue={data.sizes[0].id}
              >
                <Radio.Group>
                  <Space>
                    {data.sizes.map((item) => (
                      <Radio.Button key={item.id} value={item.id}>
                        {item.value}
                      </Radio.Button>
                    ))}
                  </Space>
                </Radio.Group>
              </Form.Item>
            </div>
            <div className="flex">
              <Form.Item
                name="color"
                label={
                  <span className="text-base font-bold mr-20">Color:</span>
                }
                initialValue={data.colors[0].id}
              >
                <Radio.Group>
                  <Space>
                    {data.colors.map((variant) => (
                      <Radio.Button
                        style={{ backgroundColor: variant.value }}
                        key={variant.id}
                        value={variant.id}
                      ></Radio.Button>
                    ))}
                  </Space>
                </Radio.Group>
              </Form.Item>
            </div>

            <div className="flex">
              <Form.Item
                name="quantity"
                initialValue={1}
                label={<span className="text-base font-bold">Quantity</span>}
              >
                <InputNumber min={1} size="large" className="w-16" />
              </Form.Item>
              <Button
                loading={isLoading}
                htmlType="submit"
                className="ml-5"
                type="primary"
                size="large"
              >
                Add to cart
              </Button>
            </div>
          </Form>
        </Col>
      </Row>
    </div>
  );
};

export default ProductDetails;
