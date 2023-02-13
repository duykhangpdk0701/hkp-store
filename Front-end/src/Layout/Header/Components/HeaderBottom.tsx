import { Col, Divider, Row } from "antd";
import React from "react";
import { NavLink } from "react-router-dom";

const HeaderBottom = () => {
  return (
    <div className="sticky top-0 z-10 bg-white">
      <Row>
        <Col span={24} md={24} xxl={0}>
          <Divider className="m-0 mb-4" />
          <div className="container m-auto">
            <div>
              <ul className="list-none flex justify-center align-item-center">
                <li>
                  <NavLink
                    className={({ isActive }) =>
                      isActive ? "py-3.5 px-6 text-orange-600" : "py-3.5 px-6"
                    }
                    to="/"
                  >
                    Home
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) =>
                      isActive ? "py-3.5 px-6 text-orange-600" : "py-3.5 px-6"
                    }
                    to="/product"
                  >
                    Shop
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) =>
                      isActive ? "py-3.5 px-6 text-orange-600" : "py-3.5 px-6"
                    }
                    to="/about"
                  >
                    About
                  </NavLink>
                </li>
                <li>
                  <NavLink
                    className={({ isActive }) =>
                      isActive ? "py-3.5 px-6 text-orange-600" : "py-3.5 px-6"
                    }
                    to="/contact"
                  >
                    Contact
                  </NavLink>
                </li>
              </ul>
            </div>
          </div>
        </Col>
      </Row>
    </div>
  );
};

export default HeaderBottom;
