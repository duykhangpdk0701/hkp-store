import { SmileOutlined } from "@ant-design/icons";
import { notification } from "antd";
import React, { useState } from "react";
import userProfileApi from "../../../Api/userProfileAPI";
import IChangePassword from "../../../Interfaces/ChangePassword";
import ChangePasswordLayout from "./Components/ChangePasswordLayout";

const ChangePassword = () => {
  const [isLoading, setIsLoading] = useState(false);
  const [alertText, setAlertText] = useState("");

  const onFinish = async (values: IChangePassword) => {
    try {
      const { currentPassword, password, passwordConfirmation } = values;

      setIsLoading(true);
      await userProfileApi.changePassword(
        currentPassword,
        password,
        passwordConfirmation
      );
      setIsLoading(false);
      notification.open({
        message: "Đổi mật khẩu thành công",
        description: "Bây giờ bạn có thể dùng mật khẩu mới",
        icon: <SmileOutlined style={{ color: "#108ee9" }} />,
      });
    } catch (error: any) {
      setIsLoading(false);
      console.log(error);
      setAlertText(error.message);
    }
  };

  return (
    <ChangePasswordLayout
      alertText={alertText}
      isLoading={isLoading}
      onFinish={onFinish}
    />
  );
};

export default ChangePassword;
