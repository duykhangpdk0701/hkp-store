import { Col, Row, Image } from "antd";
import React, { FC } from "react";
import styles from "./AuthWrapper.module.scss";
import authBanner from "../../../Assets/auth-banner.png";

interface IAuthWrapper {
  children: JSX.Element;
}

const AuthWrapper: FC<IAuthWrapper> = (props) => {
  const { children } = props;

  return (
    <Row className={styles.container}>
      <Col xs={24} sm={24} md={24} lg={12}>
        <Row justify="center" style={{ height: "100%" }}>
          <Col flex="500px" className={styles.content}>
            {children}
          </Col>
        </Row>
      </Col>
      <Col xs={0} sm={0} md={0} lg={12} className={styles.imageContainer}>
        <Image rootClassName={styles.image} src={authBanner} preview={false} />
      </Col>
    </Row>
  );
};

export default AuthWrapper;
