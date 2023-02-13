import { Menu, MenuProps } from "antd";
import { HomeTrendUp, Note, PasswordCheck, Profile } from "iconsax-react";
import React from "react";
import { Link } from "react-router-dom";

const items: MenuProps["items"] = [
  {
    label: (
      <>
        Profile
        <Link to="/setting" />
      </>
    ),
    key: "/setting",
    icon: <Profile />,
  },
  {
    label: (
      <>
        Address
        <Link to="/setting/address" />
      </>
    ),
    key: "/setting/address",
    icon: <HomeTrendUp />,
  },
  {
    label: (
      <>
        Change Password
        <Link to="/setting/change-password" />
      </>
    ),
    key: "/setting/change-password",
    icon: <PasswordCheck />,
  },
  {
    label: (
      <>
        Order
        <Link to="/setting/order" />
      </>
    ),
    key: "/setting/order",
    icon: <Note />,
  },
];
const UserProfileSideBar = () => {
  return <Menu mode="inline" className="h-full" items={items} />;
};

export default UserProfileSideBar;
