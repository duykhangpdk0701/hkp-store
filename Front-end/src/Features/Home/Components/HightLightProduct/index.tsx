import { Col, Row, Typography } from "antd";
import React from "react";
import HightLightProductItem from "./Components/HightLightProductItem";
import styles from "./HightLightProduct.module.scss";
import product5 from "../../../../Assets/Product/product5.jpg";
import product6 from "../../../../Assets/Product/product6.jpg";

const { Title, Text } = Typography;

const HightLightProduct = () => {
  return (
    <div className={styles.wrapper}>
      <div className={styles.container}>
        <Row>
          <Col span={24}>
            <div className={styles.titleContainer}>
              <Title style={{ marginBottom: 8 }}>Highlight product</Title>
              <Text>Sản phẩm ấn tượng và bán chạy nhất</Text>
            </div>
          </Col>
        </Row>
        <Row gutter={30} className={styles.productItem}>
          <Col span={24} sm={12} md={6}>
            <HightLightProductItem
              name="Marshall Portable Bluetooth"
              price={60}
              imgUrl={product5}
              imgUrlOnHover={product6}
            />
          </Col>
          <Col span={24} sm={12} md={6}>
            <HightLightProductItem
              name="Marshall Portable Bluetooth"
              price={60}
              imgUrl={product5}
              imgUrlOnHover={product6}
            />
          </Col>
          <Col span={24} sm={12} md={6}>
            <HightLightProductItem
              name="Marshall Portable Bluetooth"
              price={60}
              imgUrl={product5}
              imgUrlOnHover={product6}
            />
          </Col>
          <Col span={24} sm={12} md={6}>
            <HightLightProductItem
              name="Marshall Portable Bluetooth"
              price={60}
              imgUrl={product5}
              imgUrlOnHover={product6}
            />
          </Col>
        </Row>
      </div>
    </div>
  );
};

export default HightLightProduct;
