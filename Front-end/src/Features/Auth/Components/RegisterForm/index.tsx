import {
  Alert,
  Button,
  Col,
  Form,
  Input,
  Typography,
  Row,
  Checkbox,
} from "antd";
import { PasswordInput } from "antd-password-input-strength";
import React, { FC } from "react";
import { Link } from "react-router-dom";
import AuthWrapper from "../AuthWrapper";
import styles from "./RegisterForm.module.scss";

interface IRegisterForm {
  onFinish: (values: any) => void;
  loading: boolean;
  alertText: string | null;
}

const { Text, Title } = Typography;

const RegisterForm: FC<IRegisterForm> = (props) => {
  const { onFinish, loading, alertText } = props;

  return (
    <AuthWrapper>
      <div className={styles.container}>
        <div>
          <Text>
            Already a member? <Link to="/auth/login">Sign In</Link>
          </Text>
        </div>

        <Form onFinish={onFinish} layout="vertical">
          <Form.Item>
            <Title className={styles.title}>Sign Up</Title>
            <Text>Do you want to be one of us!</Text>
          </Form.Item>

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

          <Row gutter={20}>
            <Col span={12}>
              <Form.Item
                label="First Name"
                name="firstName"
                rules={[
                  { required: true, message: "Please input your lirst name!" },
                ]}
              >
                <Input />
              </Form.Item>
            </Col>
            <Col span={12}>
              <Form.Item
                label="Last Name"
                name="lastName"
                rules={[
                  { required: true, message: "Please input your last name!" },
                ]}
              >
                <Input />
              </Form.Item>
            </Col>
          </Row>
          <Form.Item
            label="Email"
            name="email"
            rules={[
              { required: true, message: "Please input your email!" },
              { type: "email", message: "Email is not valid!" },
            ]}
            hasFeedback
          >
            <Input />
          </Form.Item>

          <Form.Item
            label="Password"
            name="password"
            rules={[
              { required: true, message: "Please input your Password!" },
              {
                message:
                  "Password must container at lease a uppercase text and a special symbol",
                pattern: new RegExp(
                  "(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$"
                ),
              },
            ]}
            hasFeedback
          >
            <Input.Password />
          </Form.Item>
          <Form.Item
            label="Confirm Password"
            name="passwordConfirmation"
            rules={[
              {
                required: true,
                message: "Please confirm your new password!",
              },
              ({ getFieldValue }) => ({
                validator(_, value) {
                  if (!value || getFieldValue("password") === value) {
                    return Promise.resolve();
                  }
                  return Promise.reject(
                    new Error(
                      "The two passwords that you entered do not match!"
                    )
                  );
                },
              }),
            ]}
            hasFeedback
          >
            <Input.Password />
          </Form.Item>

          <Form.Item name="agreeCkb" valuePropName="checked">
            <Checkbox>
              I agree{" "}
              <a
                className="text-blue-500 underline"
                href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
              >
                terms of H-KPM
              </a>
            </Checkbox>
          </Form.Item>

          <Form.Item className="text-end">
            <Button loading={loading} type="primary" htmlType="submit">
              Submit
            </Button>
          </Form.Item>
        </Form>

        <div></div>
      </div>
    </AuthWrapper>
  );
};

export default RegisterForm;
