import { Comment, List, Rate, Tooltip } from "antd";
import React from "react";

const data = [
  {
    author: "Han Solo",
    avatar: "https://joeschmoe.io/api/v1/random",
    content: (
      <>
        <p>
          We supply a series of design principles, practical patterns and high
          quality design resources (Sketch and Axure), to help people create
          their product prototypes beautifully and efficiently.
        </p>
        <Rate className="text-sm" disabled defaultValue={5} />
      </>
    ),
    datetime: (
      <Tooltip title="2016-11-22 11:22:33">
        <span>8 hours ago</span>
      </Tooltip>
    ),
  },
  {
    author: "Han Solo",
    avatar: "https://joeschmoe.io/api/v1/random",
    content: (
      <>
        <p>
          We supply a series of design principles, practical patterns and high
          quality design resources (Sketch and Axure), to help people create
          their product prototypes beautifully and efficiently.
        </p>
        <Rate className="text-sm" disabled defaultValue={5} />
      </>
    ),
    datetime: (
      <Tooltip title="2016-11-22 10:22:33">
        <span>9 hours ago</span>
      </Tooltip>
    ),
  },
];

const ReviewsContent = () => {
  return (
    <div>
      <List
        header={`${data.length} replies`}
        itemLayout="horizontal"
        dataSource={data}
        renderItem={(item) => (
          <li>
            <Comment
              author={item.author}
              avatar={item.avatar}
              content={item.content}
              datetime={item.datetime}
            />
          </li>
        )}
      />
    </div>
  );
};

export default ReviewsContent;
