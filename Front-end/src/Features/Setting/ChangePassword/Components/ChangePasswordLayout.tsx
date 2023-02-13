import { Alert, Button, Col, Divider, Form, Input, Row } from "antd";
import React, { FC } from "react";
import IChangePassword from "../../../../Interfaces/ChangePassword";
import { PasswordInput } from "antd-password-input-strength";

interface IChangePasswordLayout {
  onFinish: (values: IChangePassword) => void;
  isLoading: boolean;
  alertText: string;
}

const ChangePasswordLayout: FC<IChangePasswordLayout> = (props) => {
  const { onFinish, isLoading, alertText } = props;

  return (
    <div className="p-8">
      <div>
        <h3 className="mb-0">Change Password</h3>
        <div>Manager to profile to secure account</div>
      </div>
      <Divider className="mt-3 mb-5" />
      <div>
        <Form
          disabled={isLoading}
          onFinish={onFinish}
          name="change-password"
          labelCol={{ span: 8 }}
          wrapperCol={{ span: 16 }}
        >
          <Row>
            <Col span={16}>
              <div>
                {alertText ? (
                  <Form.Item labelCol={{ span: 0 }} wrapperCol={{ span: 24 }}>
                    <Alert
                      className="w-full"
                      message={<span className="font-medium">Error</span>}
                      description={alertText}
                      type="error"
                      showIcon
                    />
                  </Form.Item>
                ) : null}
                <Form.Item
                  name="currentPassword"
                  rules={[
                    { required: true, message: "Please input your Password!" },
                  ]}
                  label="Password"
                >
                  <Input.Password />
                </Form.Item>
                <Form.Item
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
                  label="New password"
                  hasFeedback
                >
                  <Input.Password />
                </Form.Item>
                <Form.Item
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
                  label="Confirm Password"
                >
                  <Input.Password />
                </Form.Item>
                <Form.Item label=" " colon={false}>
                  <Button htmlType="submit" type="primary" loading={isLoading}>
                    Confirm
                  </Button>
                </Form.Item>
              </div>
            </Col>
            <Col span={8}></Col>
          </Row>
        </Form>
      </div>
    </div>
  );
};

export default ChangePasswordLayout;
