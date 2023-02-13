import { FC, ReactNode } from "react";
import { Space, Typography } from "antd";

interface ICard {
  text: string;
  subText: string;
  icon?: ReactNode;
}

const Card: FC<ICard> = ({ icon, text, subText }) => {
  return (
    <div className="w-full h-[200px] bg-[#f3f3f3] flex items-center justify-center my-7">
      <Space size={20}>
        {icon}
        <Space direction="vertical">
          <Typography.Text className="text-2xl font-medium text-[#242424]">
            {text}
          </Typography.Text>
          <Typography.Text className="text-xs uppercase font-medium text-[#747474]">
            {subText}
          </Typography.Text>
        </Space>
      </Space>
    </div>
  );
};

export default Card;
