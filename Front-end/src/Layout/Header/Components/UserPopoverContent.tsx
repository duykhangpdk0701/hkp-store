import React, { FC } from "react";
import { useGoogleLogout } from "react-google-login";
import { Link } from "react-router-dom";
import { clientIDGoogle } from "../../../Constants/SocialClientID";
import { logOut } from "../../../Contexts/slices/authSlice";
import { useAppDispatch } from "../../../Hooks/redux";

interface IUserPopoverContent {
  handleLogout: () => void;
}

const UserPopoverContent: FC<IUserPopoverContent> = (props) => {
  const dispatch = useAppDispatch();
  const { signOut } = useGoogleLogout({
    clientId: clientIDGoogle,
    onLogoutSuccess: () => {
      console.log("success");
    },
  });

  const handleLogout = async () => {
    try {
      await signOut();
      dispatch(logOut());
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <div className="px-4">
      <ul className="list-none mb-0">
        <li className="my-1">
          <Link to="/setting">Profile</Link>
        </li>
        <li className="my-1">
          <Link to="/setting/order">Order</Link>
        </li>
        <li className="my-1">
          <span
            className="cursor-pointer hover:text-orange-400"
            onClick={handleLogout}
          >
            Log out
          </span>
        </li>
      </ul>
    </div>
  );
};

export default UserPopoverContent;
