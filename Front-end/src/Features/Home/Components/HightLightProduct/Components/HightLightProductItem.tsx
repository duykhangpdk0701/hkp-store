import { Image, Typography } from "antd";
import React, { FC, MouseEvent, useState } from "react";
import { Link } from "react-router-dom";
import styles from "./HightLightProductItem.module.scss";

const { Title, Text } = Typography;

interface IHightLightProductItem {
  imgUrl: string;
  imgUrlOnHover: string;
  name: string;
  price: number;
}

const HightLightProductItem: FC<IHightLightProductItem> = (props) => {
  const { imgUrl, imgUrlOnHover, name, price } = props;
  const [isHover, setIsHover] = useState(true);

  const onMouseEnter = (event: MouseEvent<HTMLDivElement>) => {
    setIsHover(true);
  };

  const onMouseLeave = (event: MouseEvent<HTMLDivElement>) => {
    setIsHover(false);
  };

  return (
    <div onMouseEnter={onMouseEnter} onMouseLeave={onMouseLeave}>
      <div>
        <Link to="*" className={styles.titleItem}>
          <Image src={isHover ? imgUrlOnHover : imgUrl} preview={false} />
        </Link>
      </div>
      <div>
        <Title level={5}>
          <Link to="*" className={styles.titleItem}>
            {name}
          </Link>
        </Title>
        <Text className={styles.price}>${price}.00</Text>
      </div>
    </div>
  );
};

export default HightLightProductItem;
