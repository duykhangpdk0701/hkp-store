import { useMutation, useQuery } from "@tanstack/react-query";
import { useForm } from "antd/es/form/Form";
import React, { useEffect } from "react";
import authApi from "../../../Api/authAPI";
import userProfileApi from "../../../Api/userProfileAPI";
import UserProfileLayout from "./Components/UserProfileLayout";

export interface IFormProfile {
  firstName: string;
  lastName: string;
  phone: string;
}

const UserProfile = () => {
  const [form] = useForm<IFormProfile>();
  const { data, isLoading, refetch } = useQuery({
    queryKey: ["userDetail"],
    queryFn: authApi.getUserDetail,
  });

  const mutation = useMutation({
    mutationKey: ["userDetail"],
    mutationFn: ({ firstName, lastName, phone }: IFormProfile) =>
      userProfileApi.updateUser(firstName, lastName, phone),
  });

  const onFinish = async (values: IFormProfile) => {
    try {
      await mutation.mutateAsync(values);
      await refetch();
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    if (data) {
      form.setFieldsValue({
        firstName: data.profile.first_name,
        lastName: data.profile.last_name,
        phone: data.profile.phone,
      });
    }
  }, [data]);

  return (
    <UserProfileLayout
      form={form}
      data={data}
      isLoading={isLoading}
      onFinish={onFinish}
      isSubmitLoading={mutation.isLoading}
    />
  );
};

export default UserProfile;
