import React from "react";
import Slider from "../../Components/Slider";
import Banner from "../Banner";
import Banner2 from "../Banner2";
import HightLightProduct from "../HightLightProduct";

const HomePage = () => {
  return (
    <div>
      <Slider />
      <Banner />
      <HightLightProduct />
      <Banner2 />
    </div>
  );
};

export default HomePage;
