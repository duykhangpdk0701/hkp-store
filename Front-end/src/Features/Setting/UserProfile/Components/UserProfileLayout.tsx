import {
  Avatar,
  Button,
  Col,
  Divider,
  Form,
  FormInstance,
  Input,
  Row,
} from "antd";
import React, { FC } from "react";
import { IFormProfile } from "..";
import IUser from "../../../../Interfaces/User";

interface IUserProfileLayout {
  form: FormInstance<IFormProfile>;
  data?: IUser;
  isLoading: boolean;
  onFinish: (values: IFormProfile) => void;
  isSubmitLoading: boolean;
}

const UserProfileLayout: FC<IUserProfileLayout> = (props) => {
  const { form, data, isLoading, onFinish, isSubmitLoading } = props;

  return (
    <div className="p-8">
      <div>
        <div>
          <h3 className="mb-0">My Profile</h3>
          <div>Manager to profile to secure account</div>
        </div>
        <Divider className="mt-3 mb-5" />
        <div>
          <Row>
            <Col span={16}>
              <Form
                disabled={isLoading}
                form={form}
                labelCol={{ span: 6 }}
                wrapperCol={{ span: 18 }}
                onFinish={onFinish}
              >
                <Form.Item
                  required
                  label="First Name"
                  name="firstName"
                  rules={[
                    { required: true, message: "Please input First name" },
                  ]}
                >
                  <Input />
                </Form.Item>
                <Form.Item
                  required
                  label="Last Name"
                  name="lastName"
                  rules={[
                    { required: true, message: "Please input Last name" },
                  ]}
                >
                  <Input />
                </Form.Item>

                <Form.Item
                  name="phone"
                  label="Phone number"
                  rules={[
                    {
                      required: true,
                      message: "Please input your phone number!",
                    },
                  ]}
                >
                  <Input />
                </Form.Item>
                <Form.Item required label="Email">
                  <span>{data?.email}</span>
                </Form.Item>
                <Form.Item colon={false} label=" ">
                  <Button
                    className="px-7"
                    loading={isSubmitLoading}
                    size="large"
                    htmlType="submit"
                    type="primary"
                  >
                    Save
                  </Button>
                </Form.Item>
              </Form>
            </Col>
            <Col span={8}>
              <div>
                <div className="flex justify-center flex-col items-center">
                  <Avatar
                    src={
                      data?.avatar
                        ? data.avatar
                        : "https://joeschmoe.io/api/v1/random"
                    }
                    className="w-24 h-24"
                  />
                  <Button className="mt-2">Choose Image</Button>
                </div>
              </div>
            </Col>
          </Row>
        </div>
      </div>
    </div>
  );
};

export default UserProfileLayout;
