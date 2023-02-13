import axiosClient from "./axiosClient";

const userProfileApi = {
  updateUser: async (
    firstName: string,
    lastName: string,
    phone: string
  ): Promise<any> => {
    const url = "/api/v1/my-profile/update";
    const reqSchema = {
      first_name: firstName,
      last_name: lastName,
      phone,
    };

    const res = await axiosClient.put(url, reqSchema);
    return res.data;
  },

  changePassword: async (
    currentPassword: string,
    password: string,
    passwordConfirmation: string
  ): Promise<any> => {
    const url = "/api/v1/my-profile/change-password";
    const reqSchema = {
      current_password: currentPassword,
      password,
      password_confirmation: passwordConfirmation,
    };

    const res = await axiosClient.put(url, reqSchema);
    return res.data;
  },
};

export default userProfileApi;
