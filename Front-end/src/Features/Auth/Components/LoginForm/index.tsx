import { Alert, Button, Col, Form, Input, Row, Typography } from "antd";
import React, { FC } from "react";
import GoogleLogin from "react-google-login";
import { Link } from "react-router-dom";
import AuthWrapper from "../AuthWrapper";
import styles from "./LoginForm.module.scss";
import { FcGoogle } from "react-icons/fc";
import { BsFacebook } from "react-icons/bs";
import FacebookLogin from "react-facebook-login/dist/facebook-login-render-props";
import {
  clientIDFacebook,
  clientIDGoogle,
} from "../../../../Constants/SocialClientID";
interface ILoginForm {
  onFinish: (values: any) => void;
  loading: boolean;
  responseGoogle: (response: any) => void;
  responseFacebook: (response: any) => void;
  alertText: string | null;
}

const { Text, Title } = Typography;

const LoginForm: FC<ILoginForm> = (props) => {
  const { onFinish, loading, responseGoogle, responseFacebook, alertText } =
    props;

  return (
    <AuthWrapper>
      <div className={styles.container}>
        <div>
          <Text>
            Not a member yet? <Link to="/auth/register">Sign Up</Link>
          </Text>
        </div>

        <Form disabled={loading} onFinish={onFinish} layout="vertical">
          <Form.Item>
            <Title className={styles.title}>Sign In</Title>
            <Text>Join us to get some fancy clothes</Text>
          </Form.Item>
          <Alert
            className="mb-5"
            message="Login account"
            description={
              <>
                <div>
                  <strong>email:</strong> superadmin@hkp.vn
                </div>
                <div>
                  <strong>password:</strong> Pdk@073101
                </div>
              </>
            }
            type="info"
            showIcon
          />

          {alertText ? (
            <Form.Item>
              <Alert
                message={<span className="font-medium">Error</span>}
                description={alertText}
                type="error"
                showIcon
              />
            </Form.Item>
          ) : null}

          <Form.Item
            label="Email"
            name="email"
            rules={[{ required: true, message: "Please input your Email!" }]}
          >
            <Input />
          </Form.Item>

          <Form.Item
            label="Password"
            name="password"
            rules={[{ required: true, message: "Please input your Password!" }]}
          >
            <Input.Password />
          </Form.Item>

          <Form.Item className={styles.forgotPasswordWrapper}>
            <Text>
              <Link to="*">Forgot Password?</Link>
            </Text>
          </Form.Item>
          <Form.Item>
            <Row justify="space-between">
              <Col>
                <Button loading={loading} htmlType="submit" type="primary">
                  Submit
                </Button>
              </Col>
              <Col>
                <Row gutter={15}>
                  <Col span={8} className="flex justify-end items-center">
                    <span className="font-bold text-sm">Or</span>
                  </Col>
                  <Col span={8}>
                    <div>
                      <GoogleLogin
                        clientId={clientIDGoogle}
                        render={(renderProps) => (
                          <Button
                            className="flex justify-center items-center"
                            onClick={renderProps.onClick}
                            disabled={renderProps.disabled}
                            icon={<FcGoogle className="text-2xl" />}
                            shape="circle"
                            size="large"
                          />
                        )}
                        onSuccess={responseGoogle}
                        cookiePolicy={"single_host_origin"}
                        // autoLoad={true}
                      />
                    </div>
                  </Col>
                  <Col span={8}>
                    <div>
                      <FacebookLogin
                        appId={clientIDFacebook}
                        // autoLoad
                        callback={responseFacebook}
                        fields="name,email,picture"
                        render={(renderProps) => (
                          <Button
                            className="flex justify-center items-center"
                            onClick={renderProps.onClick}
                            icon={
                              <BsFacebook className="text-2xl text-blue-600" />
                            }
                            shape="circle"
                            size="large"
                          />
                        )}
                      />
                    </div>
                  </Col>
                </Row>
              </Col>
            </Row>
          </Form.Item>
        </Form>

        <div></div>
      </div>
    </AuthWrapper>
  );
};

export default LoginForm;
