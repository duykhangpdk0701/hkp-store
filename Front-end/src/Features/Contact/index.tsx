import {
  Breadcrumb,
  Col,
  Row,
  Typography,
} from "antd";
import { PhoneFilled, MailOutlined, BankFilled } from "@ant-design/icons";
import { Link } from "react-router-dom";

const Contact = () => {
  return (
    <div>
      <Row justify="center" className="mb-20">
        <Col flex={"1180px"} className="px-5">
          <Row>
            <Col span={24}>
              <Breadcrumb>
                <Breadcrumb.Item>
                  <Link to="/">Home</Link>
                </Breadcrumb.Item>
                <Breadcrumb.Item>
                  <Link to="/contact">Contact</Link>
                </Breadcrumb.Item>
              </Breadcrumb>
            </Col>
          </Row>
          <Row gutter={24}>
            <Col span={24}>
              <Typography.Title className="text-3xl block mb-5 mt-7 text-[#242424]">
                Contact Us
              </Typography.Title>
              <Typography.Text className="mb-2.5 block">
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum. Mirum est notare quam littera gothica,
                quam nunc putamus parum claram anteposuerit litterarum formas
                human. qui sequitur mutationem consuetudium lectorum. Mirum est
                notare quam
              </Typography.Text>
              <Typography.Text
                className="block py-3"
                style={{ borderTop: "1px solid #ddd" }}
              >
                <PhoneFilled className="mr-2.5" />
                Address : 273 An Duong Vuong street, District 5, Ho Chi Minh
                City
              </Typography.Text>
              <Typography.Text
                className="block py-3"
                style={{ borderTop: "1px solid #ddd" }}
              >
                <BankFilled className="mr-2.5" />
                <a
                  href="mailto:duykhangpdk0701@gmail.com"
                  className="text-[#242424]"
                >
                  duykhangpdk0701@gmail.com
                </a>
              </Typography.Text>
              <Typography.Text
                className="block py-3"
                style={{ borderTop: "1px solid #ddd" }}
              >
                <MailOutlined className="mr-2.5" />
                <a href="tel:+8793607376" className="text-[#242424]">
                  +84 793 607 376
                </a>
              </Typography.Text>
            </Col>
          </Row>
        </Col>
      </Row>

      <div className="max-w-[1180px] mx-auto px-5">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669726937899!2d106.68006961471826!3d10.759917092332728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1669401306248!5m2!1svi!2s"
          width="100%"
          height="450"
          style={{ border: "1px solid #ddd" }}
          loading="lazy"
        ></iframe>
      </div>
    </div>
  );
};

export default Contact;
