import { Breadcrumb, Button, Col, Image, Row, Typography } from "antd";
import {
  TeamOutlined,
  LikeOutlined,
  ClockCircleOutlined,
  TrophyOutlined,
} from "@ant-design/icons";
import { Link } from "react-router-dom";
import about from "../../Assets/about.jpg";
import Card from "./components/Card";

const AboutUs = () => {
  return (
    <div className="px-5">
      <Row justify="center">
        <Col flex={"1140px"}>
          <Row>
            <Col span={24}>
              <Breadcrumb>
                <Breadcrumb.Item>
                  <Link to="/">Home</Link>
                </Breadcrumb.Item>
                <Breadcrumb.Item>
                  <Link to="/about">About Us</Link>
                </Breadcrumb.Item>
              </Breadcrumb>
            </Col>
          </Row>
          <Row gutter={[24, { md: 24 }]}>
            <Col span={24} md={12}>
              <Typography.Title className="text-3xl block mb-5 mt-7 text-[#242424]">
                Welcome To Reid Store!
              </Typography.Title>
              <Typography.Text className="block text-[#747474] text-base mb-8">
                Quibusdam perspiciatis pariatur magnam ducimus excepturi error
                libero provident animi laboriosam maiores ad explicabo ea
                laudantium nostrum dolor distinctio, quas fugiat doloribus, sit,
                possimus obcaecati ab quo vel commodi eum. Laudantium libero,
                voluptate rerum sunt hic,
              </Typography.Text>
              <Typography.Text className="block text-[#747474] text-base mb-8">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse
                numquam blanditiis quos, fuga, aspernatur doloribus expedita,
                soluta dolore cumque.
              </Typography.Text>
              <div>
                <Button
                  type="primary"
                  className="uppercase flex items-center p-5 bg-white text-black rounded-none hover:bg-[#ff6a28] hover:text-white"
                  style={{ borderColor: "#000" }}
                >
                  View work
                </Button>
              </div>
            </Col>
            <Col span={24} md={12}>
              <Image preview={false} width={"100%"} src={about} />
            </Col>
          </Row>
          <Row
            gutter={[
              { md: 6, sm: 6, lg: 24 },
              { md: 6, sm: 6 },
            ]}
          >
            <Col sm={12} md={6} span={24}>
              <Card
                text={"2170"}
                subText={"HAPPY CUSTOMERS"}
                icon={<TrophyOutlined style={{ fontSize: "40px" }} />}
              />
            </Col>
            <Col sm={12} md={6} span={24}>
              <Card
                text={"8080"}
                subText={"AWARDS WON"}
                icon={<TeamOutlined style={{ fontSize: "40px" }} />}
              />
            </Col>
            <Col sm={12} md={6} span={24}>
              <Card
                text={"2150"}
                subText={"HOURS WORKED"}
                icon={<ClockCircleOutlined style={{ fontSize: "40px" }} />}
              />
            </Col>
            <Col sm={12} md={6} span={24}>
              <Card
                text={"2170"}
                subText={"COMPLETE PROJECTS"}
                icon={<LikeOutlined style={{ fontSize: "40px" }} />}
              />
            </Col>
          </Row>
        </Col>
      </Row>
    </div>
  );
};

export default AboutUs;
