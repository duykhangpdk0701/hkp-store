import { Col, Image, Row } from "antd";
import React from "react";
import banner8 from "../../../../Assets/banner8.jpg";
import banner9 from "../../../../Assets/banner9.jpg";
import banner10 from "../../../../Assets/banner10.jpg";
import styles from "./Banner.module.scss";

const Banner = () => {
  return (
    <div className={styles.Wrapper}>
      <div className={styles.Container}>
        <Row gutter={[20, 20]}>
          <Col span={24} md={8}>
            <Image src={banner8} preview={false} />
          </Col>
          <Col span={24} md={8}>
            <Image src={banner9} preview={false} />
          </Col>
          <Col span={24} md={8}>
            <Image src={banner10} preview={false} />
          </Col>
        </Row>
      </div>
    </div>
  );
};

export default Banner;
