import { Button, Col, Input, Row, Space, Typography } from "antd";
import { Link } from "react-router-dom";

const Footer = () => {
  return (
    <div className="overflow-hidden relative">
      <Row justify="center" className="w-full px-5">
        <Col flex={"1140px"}>
          <Row
            gutter={[24, { xs: 24 }]}
            className="py-12"
            style={{
              borderTop: "1px solid #ddd",
              borderBottom: "1px solid #ddd",
            }}
          >
            <Col span={24} sm={12} md={4}>
              <Space direction="vertical">
                <Typography.Title className="text-[#242424] text-base font-semibold">
                  Information
                </Typography.Title>
                <Link to={"about"} className="block leading-6">
                  About Us
                </Link>
                <Link to={"#"} className="block leading-6">
                  Delivery Information
                </Link>
                <Link to={"#"} className="block leading-6">
                  Privacy Policy
                </Link>
                <Link to={"#"} className="block leading-6">
                  Terms & Conditions
                </Link>
                <Link to={"contact"} className="block leading-6">
                  Contact Us
                </Link>
                <Link to={"#"} className="block leading-6">
                  Returns
                </Link>
              </Space>
            </Col>
            <Col span={24} sm={12} md={4}>
              <Space direction="vertical">
                <Typography.Title className="text-[#242424] text-base font-semibold">
                  Extras
                </Typography.Title>
                <Link to={"#"} className="block leading-6">
                  Brands
                </Link>
                <Link to={"#"} className="block leading-6">
                  Gift Certificates
                </Link>
                <Link to={"#"} className="block leading-6">
                  Affiliate
                </Link>
                <Link to={"#"} className="block leading-6">
                  Specials
                </Link>
                <Link to={"#"} className="block leading-6">
                  Site Map
                </Link>
                <Link to={"#"} className="block leading-6">
                  My Account
                </Link>
              </Space>
            </Col>
            <Col span={24} sm={12} md={8}>
              <Space direction="vertical">
                <Typography.Title className="text-[#242424] text-base font-semibold">
                  Extras
                </Typography.Title>
                <Typography.Text className="block leading-6">
                  Address: 237 An Duong Vuong street,
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  BAS 23JK, UK
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  Phone: (+012) 800 456 789 - 987
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  Email: demo@example.com
                </Typography.Text>
              </Space>
            </Col>
            <Col span={24} sm={12} md={8}>
              <Space direction="vertical">
                <Typography.Title className="text-[#242424] text-base font-semibold">
                  Join Our Newsletter Now
                </Typography.Title>
                <Typography.Text className="block leading-6">
                  Exceptional quality. Ethical factories. Sign up to enjoy free
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  U.S. shipping and returns on your first order.
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  <Input
                    size="large"
                    className="mt-1 mb-2"
                    placeholder="Enter your email here..."
                  />
                </Typography.Text>
                <Typography.Text className="block leading-6">
                  <Button className="hover:bg-[#ff6a28] hover:text-white w-full uppercase flex justify-center items-center rounded-none py-5 px-7 text-white bg-black">
                    SUBSCRIBE!
                  </Button>
                </Typography.Text>
              </Space>
            </Col>
          </Row>
          <Row gutter={24} className="py-7">
            <Col span={8}>
              <Typography.Text className="block leading-6">
                Made With ❤️ By HKPM
              </Typography.Text>
            </Col>
          </Row>
        </Col>
      </Row>
    </div>
  );
};

export default Footer;
