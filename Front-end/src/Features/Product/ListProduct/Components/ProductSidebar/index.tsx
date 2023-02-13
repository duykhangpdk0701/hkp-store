import { Form, Typography } from "antd";
import { FormInstance } from "antd/es/form/Form";
import React, { FC } from "react";
import SliderInput from "../../../../../Components/SliderInput";
import IBrand from "../../../../../Interfaces/Brand";
import ICategory from "../../../../../Interfaces/Category";
import IGender from "../../../../../Interfaces/Gender";
import IPriceRange from "../../../../../Interfaces/PriceRange";
import ISize from "../../../../../Interfaces/Size";
import RadioFilter from "./RadioFilter";
import CheckBoxFilter from "./SelectFilter";

interface IProductSidebar {
  radioForm: FormInstance<any>;
  sliderForm: FormInstance<any>;
  onChangeRadioFilter: (_: any, values: any) => void;
  onFinishSliderFilter: (values: any) => void;
  listBrand?: IBrand[];
  listCategory?: ICategory[];
  listGender?: IGender[];
  priceRange?: IPriceRange;
  listSize?: ISize[];
  isLoadingListSize?: boolean;
  isLoadingPriceRange?: boolean;
  isBrandListLoading: boolean;
  isCategoryListLoading: boolean;
  isGenderListLoading: boolean;
}

const { Title } = Typography;

const ProductSidebar: FC<IProductSidebar> = (props) => {
  const {
    radioForm,
    sliderForm,
    onChangeRadioFilter,
    onFinishSliderFilter,
    listBrand,
    isBrandListLoading,
    listCategory,
    isCategoryListLoading,
    listGender,
    isGenderListLoading,
    priceRange,
    isLoadingPriceRange,
    listSize,
    isLoadingListSize,
  } = props;

  return (
    <div>
      <Title level={2}>Filter By Price</Title>

      {/* sliderFilter */}
      <Form
        name="sliderFilter"
        form={sliderForm}
        onFinish={onFinishSliderFilter}
      >
        <SliderInput />
      </Form>
      {/* radioFilter */}
      <Form
        name="radioFilter"
        form={radioForm}
        layout="vertical"
        onValuesChange={onChangeRadioFilter}
      >
        <Form.Item name="category">
          <RadioFilter
            label="Categories"
            options={listCategory?.map((item) => ({
              label: item.name,
              value: item.id,
              amount: item.id,
            }))}
            isLoading={isCategoryListLoading}
          />
        </Form.Item>
        <Form.Item name="brand">
          <RadioFilter
            label="Brand"
            options={listBrand?.map((item) => ({
              label: item.name,
              value: item.id,
              amount: item.qty_items,
            }))}
            isLoading={isBrandListLoading}
          />
        </Form.Item>
        <Form.Item name="size">
          <RadioFilter
            label="Size"
            options={listSize?.map((item) => ({
              label: item.value,
              value: item.id,
              amount: item.id,
            }))}
            isLoading={isLoadingListSize}
          />
        </Form.Item>
        <Form.Item name="gender">
          <RadioFilter
            label="Gender"
            options={listGender?.map((item) => ({
              label: item.name,
              value: item.id,
              amount: item.id,
            }))}
            isLoading={isGenderListLoading}
          />
        </Form.Item>
      </Form>
    </div>
  );
};

export default ProductSidebar;
