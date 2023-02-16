import { ShoppingCartOutlined } from "@ant-design/icons";
import { Row, Col, Button, Popover, Image, Avatar } from "antd";
import React from "react";
import { Link, NavLink } from "react-router-dom";
import PopoverContent from "./Components/PopoverContent";
import styles from "./Header.module.scss";
import logo from "../../Assets/logo.png";
import HeaderBottom from "./Components/HeaderBottom";
import UserPopoverContent from "./Components/UserPopoverContent";
import authApi from "../../Api/authAPI";
import { useAppSelector } from "../../Hooks/redux";
import { useDispatch } from "react-redux";
import { logOut } from "../../Contexts/slices/authSlice";
import cartApi from "../../Api/cartApi";
import { useQuery } from "@tanstack/react-query";

const Header = () => {
  const authState = useAppSelector((state) => state.auth.current);
  const dispatch = useDispatch();
  const cart = useQuery({
    queryKey: ["cartHeader"],
    queryFn: cartApi.getQuotes,
  });

  const handleLogout = async () => {
    try {
      await authApi.logout();
      dispatch(logOut());
    } catch (error: any) {
      console.error(error.message);
    }
  };

  return (
    <>
      <nav className="relative">
        <div className={styles.middle_inner}>
          <div>
            <Row>
              <Col span={8}></Col>
              <Col span={8}></Col>
              <Col
                span={8}
                style={{
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "flex-end",
                }}
              >
                <div>
                  {authState.isLogIn ? (
                    <Popover
                      className="mr-5"
                      content={
                        <UserPopoverContent handleLogout={handleLogout} />
                      }
                    >
                      <Avatar src={authState.avatar} />
                    </Popover>
                  ) : (
                    <Link to="/auth/login" className="mr-5">
                      Login
                    </Link>
                  )}

                  <Popover
                    content={
                      <PopoverContent
                        data={cart.data}
                        isLoading={cart.isLoading}
                      />
                    }
                    placement="bottomRight"
                  >
                    <Link to="/cart">
                      <Button shape="round" icon={<ShoppingCartOutlined />}>
                        {cart?.data?.quote_detail?.length || 0} Item
                      </Button>
                    </Link>
                  </Popover>
                </div>
              </Col>
            </Row>
          </div>

          <div className={`${styles.horizontal_menu} md:w-auto lg:w-[900px]`}>
            <Row align="middle">
              <Col span={0} md={0} xxl={6}>
                <Row justify="space-between">
                  <Col>
                    <NavLink
                      className={({ isActive }) =>
                        isActive ? "text-orange-600" : ""
                      }
                      to="/"
                    >
                      Home
                    </NavLink>
                  </Col>

                  <Col>
                    <NavLink
                      className={({ isActive }) =>
                        isActive ? "text-orange-600" : ""
                      }
                      to="/product"
                    >
                      Shop
                    </NavLink>
                  </Col>
                </Row>
              </Col>
              <Col span={24} md={24} xxl={12}>
                <Row justify="center">
                  <Col>
                    <Link to="/">
                      <Image src={logo} preview={false} />
                    </Link>
                  </Col>
                </Row>
              </Col>
              <Col span={0} md={0} xxl={6}>
                <Row justify="space-between">
                  <Col>
                    <NavLink
                      className={({ isActive }) =>
                        isActive ? "text-orange-600" : ""
                      }
                      to="/about"
                    >
                      About
                    </NavLink>
                  </Col>
                  <Col>
                    <NavLink
                      className={({ isActive }) =>
                        isActive ? "text-orange-600" : ""
                      }
                      to="/contact"
                    >
                      Contact
                    </NavLink>
                  </Col>
                </Row>
              </Col>
            </Row>
          </div>
        </div>
      </nav>
      <HeaderBottom />
    </>
  );
};

export default Header;
