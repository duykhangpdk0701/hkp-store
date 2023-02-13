import { Col, Row, Image } from "antd";
import React from "react";
import banner11 from "../../../../Assets/banner11.jpg";
import banner12 from "../../../../Assets/banner12.jpg";
import styles from "./Banner2.module.scss";

const Banner2 = () => {
  return (
    <div className={styles.Wrapper}>
      <div className={styles.Container}>
        <Row gutter={[20, 20]}>
          <Col span={24} md={12}>
            <Image src={banner11} preview={false} />
          </Col>
          <Col span={24} md={12}>
            <Image src={banner12} preview={false} />
          </Col>
        </Row>
      </div>
    </div>
  );
};

export default Banner2;
