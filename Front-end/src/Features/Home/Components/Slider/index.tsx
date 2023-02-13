import { Carousel, Image } from "antd";
import React from "react";
import styles from "./Slider.module.scss";
import content3 from "../../../../Assets/Slider/content3.png";
import content4 from "../../../../Assets/Slider/content4.png";
import content5 from "../../../../Assets/Slider/content5.png";
import slider4 from "../../../../Assets/Slider/slider4.jpg";
import slider5 from "../../../../Assets/Slider/slider5.jpg";
import slider6 from "../../../../Assets/Slider/slider6.jpg";
import { Link } from "react-router-dom";

const Slider = () => {
  return (
    <Carousel autoplay className={styles.slider}>
      <div>
        <div
          className={styles.content}
          style={{ backgroundImage: `url(${slider4})` }}
        >
          <div className={styles.contentWrapper}>
            <Image width={720} src={content3} preview={false} />
            <Link className={styles.linkBanner} to="/">
              Discover Now
            </Link>
          </div>
        </div>
      </div>
      <div>
        <div
          className={styles.content}
          style={{ backgroundImage: `url(${slider5})` }}
        >
          <div className={styles.contentWrapper}>
            <Image src={content4} preview={false} />
            <Link className={styles.linkBanner} to="/">
              Discover Now
            </Link>
          </div>
        </div>
      </div>
      <div>
        <div
          className={styles.content}
          style={{ backgroundImage: `url(${slider6})` }}
        >
          <div className={styles.contentWrapper}>
            <Image width={720} src={content5} preview={false} />
            <Link className={styles.linkBanner} to="/">
              Discover Now
            </Link>
          </div>
        </div>
      </div>
    </Carousel>
  );
};

export default Slider;
